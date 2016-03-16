#ifndef __CC3200R1M1RGC__
#include <SPI.h>
#endif
#include <WiFi.h>
#include "SPI.h"
#include "OneMsTaskTimer.h"
#include "LCD_SharpBoosterPack_SPI.h"



LCD_SharpBoosterPack_SPI myScreen;
// your network name also called SSID
char ssid[] = "energia";
// your network password
char password[] = "launchpad";

// Initialize the Wifi client library
WiFiClient client;

// server address:
IPAddress server(192,168,173,1);

unsigned long lastConnectionTime = 0;            // last time you connected to the server, in milliseconds
const unsigned long postingInterval = 10L * 1000L; // delay between updates, in milliseconds
uint8_t progreso=100;
unsigned long lastTime = millis()-500L;
unsigned long newTime = millis();
uint8_t tiempo=0;
uint8_t tiempo_antiguo=61;
String codigo_operacion="";


void setup()
{
    myScreen.begin();
    myScreen.setFont(1);
    myScreen.text(10, 10, "Hello!");
    myScreen.flush();  
    
    delay(1000);
    myScreen.clear();
    //Initialize serial and wait for port to open:
    Serial.begin(115200);

    // attempt to connect to Wifi network:
    Serial.print("Attempting to connect to Network named: ");
    // print the network name (SSID);
    Serial.println(ssid); 
    // Connect to WPA/WPA2 network. Change this line if using open or WEP network:
    WiFi.begin(ssid, password);
    while ( WiFi.status() != WL_CONNECTED) 
    {
        // print dots while we wait to connect
        Serial.print(".");
        delay(300);
    }
  
    Serial.println("\nYou're connected to the network");
    Serial.println("Waiting for an ip address");
    
    while (WiFi.localIP() == INADDR_NONE)
    {
        // print dots while we wait for an ip addresss
        Serial.print(".");
        delay(300);
    }
  
    Serial.println("\nIP Address obtained");
    // We are connected and have an IP address.
    // Print the WiFi status.
    printWifiStatus();
}

void loop() {
   
    dibujarbarra();
    myScreen.flush();
  
    while (client.available())
    {
        char c = client.read();
        Serial.write(c);
        if(String(c).equals("<"))
        {
            while(!String(c=client.read()).equals(">"))
            {
                codigo_operacion+=String(c);
            }
            Serial.println(codigo_operacion);
            if(String(codigo_operacion).equals("time"))
            {
                tiempo=client.parseInt();
                Serial.println(tiempo);
            }
            else if(String(codigo_operacion).equals("estado"))
            {
                if(String(c=client.read()).equals("1"))
                {
                    myScreen.clearBuffer();
                    Serial.println("el estado es 1");
                    myScreen.setFont(1);
                    myScreen.text(10,10,"Puerta abierta");
                    myScreen.flush(); //empty the buffer, sending screen
                    delay(4000);
                    myScreen.clear();//clean the buffer
                    qrRequest();//qr code request
                }else
                {
                    Serial.println("el estado es 0");
                }
            }
            else if(codigo_operacion.equals("qr"))
            {
                myScreen.clearBuffer();
                uint8_t i = 0;
                uint8_t j = 0;
                String num="";
                while(!String(c=client.read()).equals("<"))
                {
                    num=String(c);
                    if (num.equals("1"))
                    {
                        //paint a pixel on the screen
                        myScreen.setXY(2*i,2*j,1);
                        myScreen.setXY(2*i+1,2*j,1);
                        myScreen.setXY(2*i,2*j+1,1);
                        myScreen.setXY(2*i+1,2*j+1,1);
                        2*i++;
                    }else if (num.equals("0"))
                    {
                        2*i++;
                    }else if(num.equals("\n"))
                    {
                        myScreen.flush();
                        Serial.println("flusqr:");
                        2*j++;
                        i=0;
                    }
                }
          }

          myScreen.flush();  
          codigo_operacion="";
       } 
   }
   //timer, calculates the time needed to return to order a QR code
   newTime=millis(); 
   if ( newTime - lastTime > 500L) 
   { 
        lastTime=newTime;
        rellenarbarra((tiempo*95)/59);
        myScreen.flush(); 
        Serial.println("temporizador:");
      
        if(tiempo_antiguo>tiempo)
        {
          qrRequest();
        }else 
        {
          estadoRequest();
        }
        tiempo_antiguo=tiempo;
  
   }
}

//function requesting the qr code
void qrRequest() 
{
    // close any connection before send a new request.
    // This will free the socket on the WiFi shield
    client.stop();
  
    // if there's a successful connection:
    if (client.connect(server, 80)) 
    {
        Serial.println("connecting...Consultando qr");
        // send the HTTP PUT request:
        client.println("GET /qr/index.php HTTP/1.1");
        client.println("Host: 192.168.173.1");
        client.println("Door: 7");
        client.println("User-Agent: Energia/1.1");
        client.println("Connection: close");
        client.println();
    
        // note the time that the connection was made:
        lastConnectionTime = millis();
    }
    else 
    {
        // if you couldn't make a connection:
        Serial.println("connection failed");
    }
}
//function query the status of the QR code
void estadoRequest() {
    // close any connection before send a new request.
    // This will free the socket on the WiFi shield
    client.stop();
  
    // if there's a successful connection:
    if (client.connect(server, 80)) 
    {
        Serial.println("connecting... Consultando estado");
        // send the HTTP PUT request:
        client.println("GET /qr/estado.php HTTP/1.1");
        client.println("Host: 192.168.173.1");
        client.println("Door: 7");
        client.println("User-Agent: Energia/1.1");
        client.println("Connection: close");
        client.println();
    
        // note the time that the connection was made:
        lastConnectionTime = millis();
    }
    else {
        // if you couldn't make a connection:
        Serial.println("connection failed");
    }
}

//function to display the Serial Monitor the characteristics of the network in which we are connected
void printWifiStatus() 
{
    // print the SSID of the network you're attached to:
    Serial.print("SSID: ");
    Serial.println(WiFi.SSID());
  
    // print your WiFi IP address:
    IPAddress ip = WiFi.localIP();
    Serial.print("IP Address: ");
    Serial.println(ip);
  
    // print the received signal strength:
    long rssi = WiFi.RSSI();
    Serial.print("signal strength (RSSI):");
    Serial.print(rssi);
    Serial.println(" dBm");
}
//function to draw the structure of the time bar
void dibujarbarra()
{
    uint8_t a = 0;
    uint8_t b = 0;
     
    b=90;
    for(a=0;a<96;a++)
    {
       myScreen.setXY(a,b,1);
    }
     
    b=95;
    for(a=0;a<96;a++)
    {
       myScreen.setXY(a,b,1);
    }
     
    b=0;
    for(a=90;a<96;a++)
    {
       myScreen.setXY(b,a,1);
    }
     
    b=95;
    for(a=90;a<96;a++)
    {
       myScreen.setXY(b,a,1);
    }
}
//function to populate the bar, which shows the time remaining before you change the QR code
void rellenarbarra(uint8_t porcentaje)
{
     uint8_t a = 0;
     uint8_t b = 0;

     for(a=1;a<porcentaje;a++)
     {
         for(b=91;b<96;b++)
         {
             myScreen.setXY(a,b,1);
         }
     }
}


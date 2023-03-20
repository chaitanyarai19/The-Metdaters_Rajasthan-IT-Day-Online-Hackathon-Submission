
#define BLYNK_PRINT Serial

#include <ESP8266WiFi.h>
#include <BlynkSimpleEsp8266.h>

// You should get Auth Token in the Blynk App.
// Go to the Project Settings (nut icon).
char auth[] = "Ieq2eYNfPS1W0eSIuoCYpf8Xs36iaps2";

// Your WiFi credentials.
// Set password to "" for open networks.
char ssid[] = "Redmif";
char pass[] = "123456789";

SimpleTimer timer;

int temp,mq2 = A0; 
int data = 0; 
int buzzer = 4;
int led_green = 14;
int led_red = 12; 
int relayInput = 2;

int dataadc;
float cr;

void setup() 
{
pinMode(buzzer, OUTPUT);
pinMode(mq2, INPUT);
pinMode(led_green, OUTPUT);
pinMode(led_red, OUTPUT);
pinMode(relayInput,OUTPUT);
digitalWrite(led_green, LOW);
digitalWrite(led_red, LOW);

  Serial.begin(9600);
  Blynk.begin(auth, ssid, pass);
  timer.setInterval(1000L, getSendData);
  timer.setInterval(1000L, sendUptime);
}
 
void loop() 
{
  timer.run();
  Blynk.run();
}

void sendUptime(){
  Blynk.virtualWrite(V3, cr);
  }
 
void getSendData()
{
data = analogRead(mq2); 
Serial.print("smoke Level: ");
Serial.println(data);
Blynk.virtualWrite(V2, data);
 
  if (data > 350 )
  {
    digitalWrite(led_green, LOW);
digitalWrite(led_red, HIGH);
digitalWrite(buzzer, HIGH);
digitalWrite(relayInput, HIGH);
Blynk.notify("Alert !!! Smoke detected , dont worry it will be converted into water shortly.");

delay(500);
digitalWrite(buzzer, LOW);
  }else
{
digitalWrite(buzzer, LOW);
digitalWrite(led_green, HIGH);
digitalWrite(led_red, LOW);
digitalWrite(relayInput, LOW);
}
 dataadc = analogRead(temp);
cr = dataadc*(3.2/1023.0)*100.0;

}

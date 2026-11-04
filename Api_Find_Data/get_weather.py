import sys
import requests

if len(sys.argv) < 2:
    print("city name missing")
    sys.exit()

city = sys.argv[1]
API_KEY = "f74eb7a2671729ac111943f5bb35d451"
url = f"http://api.openweathermap.org/data/2.5/weather?q={city}&appid={API_KEY}&units=metric"

try:
    response = requests.get(url)
    data = response.json()
    
    if data.get("cod") == 200:
        temp = data["main"]["temp"]
        print(f"City: {data['name']}")
        print(f"Temperature: {temp} °C")
    elif data.get("cod") == "404":
        print("invalid city name")
    else:
        print("faild")
except Exception as e:
    print(f"Exception: {str(e)}")
from flask import Flask, render_template, request
from google import genai

app = Flask(__name__)

api_key = "YOUR_API_KEY"
client = genai.Client(api_key=api_key)


@app.route("/", methods=["GET", "POST"])
def home():
  output = ""
  user_input = ""

  if request.method == "POST":
    user_input = request.form.get("prompt", "")
    try:
      response = client.models.generate_content(
          model="gemini-3.1-flash-lite",
          contents=user_input,
      )
      output = response.text
    except Exception as e:
      output = str(e)

  return render_template("index.html", output=output, user_input=user_input)


if __name__ == "__main__":
  app.run(debug=True)
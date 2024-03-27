from flask import Flask, request
from twilio.twiml.messaging_response import MessagingResponse
from twilio.rest import Client

app = Flask(__name__)

# Your Twilio account SID and auth token
account_sid = 'ACd611507c4f955d5beb35ae24d2ee8afc'
auth_token = 'fdbd29a21664db7439dcb8211e13b86a'
client = Client(account_sid, auth_token)

# Your Twilio phone number
twilio_phone_number = '+18634100791'

@app.route("/sms", methods=['GET', 'POST'])
def sms_reply():
    """Respond to incoming messages with a simple text message."""
    # Start our response
    resp = MessagingResponse()

    # Add a message
    resp.message("Thank you for your message. We'll get back to you shortly.")

    # Get the phone number and ID from the incoming message
    phone_number = request.values.get('From', None)
    id = request.values.get('Body', None)

    # Send the SMS with the ID to the phone number
    send_sms(phone_number, id)

    return str(resp)

@app.route("/")
def home():
    return "Welcome to the SMS Notification App!"

def send_sms(phone_number, id):
    """Send an SMS to the provided phone number with the ID as the message."""
    message = client.messages.create(
        body=f'Your report ID is: {id}',
        from_=twilio_phone_number,
        to=phone_number
    )
    return message.sid

if __name__ == "__main__":
    app.run(debug=True)
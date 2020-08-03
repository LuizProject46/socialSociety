const exampleSocket = new WebSocket("ws://localhost:8080");

exampleSocket.onopen = function(event) {
  console.log("user connected");
};

const Name = window.user_name;
const photo = window.user_photo
console.log(photo)
sendMessage = () => {
  let messageElem = document.getElementById("message");
  let textMessage = messageElem.value;

  if (textMessage.trim() !== "") {
    let msg = {
      type: "message",
      text: textMessage,
      sender: Name,
      date: Date.now(),
      photo: `${photo}`
    };

    exampleSocket.send(JSON.stringify(msg));

    messageElem.value = "";

    messageParse(Name, textMessage,photo);
  }
};

exampleSocket.onmessage = function(event) {
  let data = JSON.parse(event.data);
  messageParse(data.sender, data.text,data.photo);
};

messageParse = (sender, msg,photo) => {
  let html = "";
  if (sender !== Name) {
    html = `<li class="message left appeared">
        <div class="avatar"><img style="border-radius: 27px;
        width: 46px;
        height: 45px;"src='../../uploads/${photo}'/></div>
        <div class="text_wrapper"><label style="color: purple;
        font-weight: 600;">${sender}</label>
        <div class="text">${msg}</div>
      </div></li>`;
  } else {
    html = `<li class="message right appeared">
        <div class="avatar"><img style="border-radius: 27px;
        width: 46px;
        height: 45px;"src='../../uploads/${photo}'/></div>
        <div class="text_wrapper">
        <div class="text">${msg}</div>
      </div></li>`;
  }

  document.getElementById("messagesBox").innerHTML += html;
  $("#messagesBox").scrollTop($("#messagesBox")[0].scrollHeight)
};
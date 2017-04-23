<script src="https://www.gstatic.com/firebasejs/3.7.5/firebase.js"></script>
<script>
var username = document.getElementById('username');
var message = document.getElementById('message');
var messages = document.getElementById('messages');
var form = document.getElementById('form');
var login = document.getElementById('login');

// Initialize Firebase
  var config = {
    apiKey: "AIzaSyB7lB5RD3ITs6J2ykx8yJsrsz9_iiSUdpM",
    authDomain: "gdgdemo-4bdf9.firebaseapp.com",
    databaseURL: "https://gdgdemo-4bdf9.firebaseio.com",
    projectId: "gdgdemo-4bdf9",
    storageBucket: "gdgdemo-4bdf9.appspot.com",
    messagingSenderId: "313931292453"
  };
  firebase.initializeApp(config);

// define Firebase ref
var messagesRef = firebase.database().ref('messages');

// Retrieve new posts as they are added to Firebase
messagesRef.on("child_added", function(data) {
  var newPost = data.val();

  var msg = document.createElement("div");
  msg.innerText = newPost.username + ": " + newPost.message;

  messages.appendChild(msg);
  console.log(newPost);

});
</script>

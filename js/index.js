//SIDEBAR
const menuItems = document.querySelectorAll('.menu-item');

const changeActiveItem = () => {
   menuItems.forEach(item => {
      item.classList.remove('active');
   })
}
// MESSAGES

const messagesNotification = document.querySelector('#messages-notification');
const messages = document.querySelector('.messages');
const message = messages.querySelectorAll('.message');
const messageSearch = document.querySelector('#message-search');

// LIKES

const hearts = document.getElementsByName('heart');

// COMMENTS

const commentInputs = document.getElementsByName('commentInput');

// ================ SIDEBAR =================
menuItems.forEach((item) => {
  item.addEventListener('click', () => {
    changeActiveItem();
    item.classList.add('active');
    if(item.id != 'notifications'){
      document.querySelector('.notifications-popup').style.display = 'none';
    } else{
      document.querySelector('.notifications-popup').style.display = 'block';
      document.querySelector('#notifications .notifications-count').style.display = 'none';
    }
  })
})

// ================= MESSAGE =================
// search chats
const searchMessage = () => {
   const val =  messageSearch.value.toLowerCase();
   message.forEach(user => {
      let name = user.querySelector('h5').textContent.toLowerCase();
      if(name.indexOf(val) != -1){
         user.style.display='flex';
      } else{
         user.style.display='none';
      }
   })
}

// search chat
messageSearch.addEventListener('keyup', searchMessage);

messagesNotification.addEventListener('click', () => {
   messages.style.boxShadow = '0 0 1rem var(--color-primary)';
   messagesNotification.querySelector('.notifications-count').style.display = 'none';
   setTimeout(() => {
      messages.style.boxShadow = 'none';
   }, 2000);
})

// ===================== LIKES =========================

hearts.forEach(item => {
   item.addEventListener('click', function(event) {
      let liked = false;
      username = this.getAttribute('username');
      post_id = this.getAttribute('post_id');
     for (let index = 0; index < item.classList.length; index++) {
         if(item.classList[index] == "active"){
            liked = true;
            break;
         }
     }

     if(liked) {
       item.classList.remove('active');
       removeLike(username, post_id);
     }
     else {
       item.classList.add('active');
       sendLike(username, post_id);
     }
   })
 })

 function sendLike(username, post_id) {
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
     if (this.readyState == 4 && this.status == 200) {
       console.log(this.responseText);
     }
   };
   xhttp.open("GET", "/script/leaveLike.php?username=" + username + "&post_id=" + post_id, true);
   xhttp.send();
}

function removeLike(username, post_id) {
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
     if (this.readyState == 4 && this.status == 200) {
       console.log(this.responseText);
     }
   };
   xhttp.open("GET", "/script/removeLike.php?username=" + username + "&post_id=" + post_id, true);
   xhttp.send();
}

// ======================== COMMENTS =====================



commentInputs.forEach(item => {
   item.addEventListener('keyup', function(event) {
      if(item.value != ''){
         item.nextElementSibling.style.display = 'block';
      }
      else {
         item.nextElementSibling.style.display = 'none';
      }
   })
 })
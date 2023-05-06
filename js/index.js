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
      // document.querySelector('#notifications .notifications-count').style.display = 'none';
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
      document.getElementById("numberLike" + post_id).innerHTML = removeLike(username, post_id);
     }
     else {
       item.classList.add('active');
      document.getElementById("numberLike" + post_id).innerHTML = sendLike(username, post_id);
     }
     
     document.getElementById("userLike" + post_id).innerHTML = getUserLike(post_id);
     document.getElementById("photoLike" + post_id).innerHTML = printLikePhotos(post_id);
   })
 })

   function printLikePhotos(post_id) {

   var xhttp = new XMLHttpRequest();
   xhttp.open("GET", "/script/printLikePhotos.php?post_id=" + post_id, false);
   xhttp.send();

   return xhttp.responseText;
}

 function getUserLike(post_id) {
   var xhttp = new XMLHttpRequest();
   xhttp.open("GET", "/script/getUserLike.php?post_id=" + post_id, false);
   xhttp.send();

   return xhttp.responseText;
}


 function sendLike(username, post_id) {
   var xhttp = new XMLHttpRequest();
   xhttp.open("GET", "/script/leaveLike.php?username=" + username + "&post_id=" + post_id, true);
   xhttp.send();

   return xhttp.responseText;
}

function removeLike(username, post_id) {
   var xhttp = new XMLHttpRequest();
   xhttp.open("GET", "/script/removeLike.php?username=" + username + "&post_id=" + post_id, true);
   xhttp.send();

   return xhttp.responseText;
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

// ======================== SEND COMMENTS =====================

const commentForm = document.getElementById('comment-form');


document.querySelectorAll('.btn-addComment').forEach(button => {
   button.addEventListener('click', function(event) {
      event.preventDefault();

       let username = this.getAttribute('data-username');
       let id_post = this.getAttribute('data-id_post');
      //  take the wury selector by ID
      const commentInput = document.getElementById('idCommentInput' + id_post);
       let commentText = commentInput.value.trim();
       if (commentText !== '') {
         sendCommentToBackend(username, id_post, commentText);
         $('#idCommentInput' + id_post).val('');
       }
   });
});

function sendCommentToBackend(username, id_post, commentText){
   var xhr = new XMLHttpRequest();
   xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
      }
    };
    data={
      "username": username,
      "id_post": id_post,
      "text": commentText
    };
    data = JSON.stringify(data);
    xhr.open('POST', '/script/addComment.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(data);
   //  window.location.reload();
}
// commentForm.addEventListener('submit', (event) => {
//   event.preventDefault();
  

  
//   const commentInput = document.querySelector('.comment-input');
//   const commentText = commentInput.value.trim();

//   if (commentText !== '') {
//     const xhr = new XMLHttpRequest();
//     xhr.onreadystatechange = function() {
//       if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
//         // Handle successful response from server
//         console.log(this.responseText);
//       } else if (this.readyState === XMLHttpRequest.DONE && this.status !== 200) {
//         // Handle error response from server
//         console.error('Error:', this.status);
//       }
//     };
//     xhr.open('POST', 'add-comment.php', true);
//     xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
//     xhr.send('comment=' + encodeURIComponent(commentText));
//   }
// });


// ==================== MAKE FRIENDS ====================

const makefriendsButton = document.getElementById('makeFriendsButton');
const makefriendsPopup = document.getElementById('friendsPopup');
const makefriendsClose = document.getElementById('closefriendsPopup');
makefriendsButton.addEventListener('click', () => {
   makefriendsPopup.style.display = 'block';
   // document.body.style.overflow = 'hidden !important';
})
makefriendsClose.addEventListener('click', () => {
   makefriendsPopup.style.display = 'none';
   // document.body.style.overflow = 'initial';
})


// ======================= SEARCH PROFILES =========================

const profileSearch = document.querySelector('#profile-search');
const profile = document.querySelectorAll('.profile-to-search');

const searchProfile = () => {
   const val =  profileSearch.value.toLowerCase();
   profile.forEach(user => {
      let username = user.querySelector('p').textContent.toLowerCase();
      let name = user.querySelector('h4').textContent.toLowerCase();
      if(username.indexOf(val) != -1 || name.indexOf(val) != -1){
         user.style.display='flex';
      } else{
         user.style.display='none';
      }
   })
}

// search chat

profileSearch.addEventListener('keyup', searchProfile);


// ========================= ADD FRIENDS =============================

const addButtons = document.getElementsByName('addButton');

addButtons.forEach(item => {
   item.addEventListener('click', function(event) {
      let friend = this.getAttribute('friend');
      let me = this.getAttribute('usern');
      addFriend(me,friend);
      this.style.display = 'none';
   })
 })

 function addFriend(me, friend) {
   var xhttp = new XMLHttpRequest();
   xhttp.open("GET", "/script/backAddFriend.php?me=" + me + "&friend=" + friend, false);
   xhttp.send();

   return xhttp.responseText;
}


// ========================= WRITE AND SEND MESSAGE ======================

const writeMessageButton = document.getElementById('writeMessageButton');
const messagePopup = document.getElementById('messagePopup');
const messageClose = document.getElementById('messageClosePopup');
writeMessageButton.addEventListener('click', () => {
   messagePopup.style.display = 'block';
   // document.body.style.overflow = 'hidden !important';
})
messageClose.addEventListener('click', () => {
   messagePopup.style.display = 'none';
   // document.body.style.overflow = 'initial';
})



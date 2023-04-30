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

// LIKE

const hearts = document.getElementsByName('heart');

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

hearts.forEach((item) => {
   item.addEventListener('click', () => {
      var liked = false;
     for (let index = 0; index < item.classList.length; index++) {
         if(item.classList[index] == "active"){
            liked = true;
            break;
         }
     }

     if(liked) {
       item.classList.remove('active');
     }
     else {
       item.classList.add('active');
     }
   })
 })


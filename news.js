
const mostraNotificacao = () => {
    const notification = new Notification('Backup News of Netflix!', {
    	
      body: 'Go to www.netflix.com',
    	icon: '../DAO/images/netflix.jpg'

    });

    notification.onclick = (e) => {
      //e.preventDefault();
      //window.focus();
      window.open("https://www.netflix.com");
      //////window.location.href = 'www.netflix.com';
      notification.close();
    }

};

const validaNotificacao = () => {
	
  if (Notification.permission === 'granted'){
       mostraNotificacao();
  } else if (Notification.permission !== 'denied'){
     Notification.requestPermission(function (permission) {
       
       if (permission === 'granted'){
            mostraNotificacao();
       }
       
     });

    } 

};

document.getElementById('notificar').addEventListener('click', validaNotificacao);
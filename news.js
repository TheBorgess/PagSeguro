
const mostraNotificacao = () => {
  var nome = document.getElementById('nome').value;
  if (nome != 'Gremio'){  
  
    const notification = new Notification(nome, {
      body: 'Go to www.netflix.com',
    	icon: '../DAO/images/login.jpg',
      image: '../DAO/images/netflix.jpg',
      badge: '../DAO/images/logo_php.jpg'
    });

    //setTimeout(() => notification.close(), 1000*1000);
    //setTimeout(() => {
    //    notification.close();
    // }, 100 * 1000);

    notification.onclick = (e) => {
      window.open("https://www.netflix.com");
      notification.close();
    }
  
  } else{
  
      const notification = new Notification(nome, {
        body: 'Go to www.gremio.net',
        icon: '../DAO/images/gremio.jpg',
        image: '../DAO/images/arenaGremio.jpg'
      });
   
      notification.onclick = (e) => {
        window.open("https://www.gremio.net");
        notification.close();
      }
  
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
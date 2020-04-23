
function getMessages()
{
    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open("GET","handler.php");
    requeteAjax.onload = function()
    {
        const resultat = JSON.parse(requeteAjax.responseText);
        const html = resultat.reverse().map(function(message){
        
            return `
            <article id="messageArticle">
                ${message.date.substring(11,16)}
                ${message.utilisateur}
                ${message.message}
            </article>
            `
        }).join('');

const messageArticle = document.querySelector('chat');

console.log(messageArticle);
chatDiv.innerHTML = html;
// messageArticle.scrollTop = chatDiv.scrollHeight;

}

requeteAjax.send();
}

function postMessage(event)
{
    event.preventDefault();

    const pseudo = document.querySelector("")

    const data = new FormData();
    data.append('pseudo', pseudo.value);
    data.append('message', message.value);

    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open('POST', 'handler.php?task=write');

    requeteAjax.onload = function()
    {
        content.value = '';
        content.focus();
        getMessages();
    }
    requeteAjax.send(data);
}

document.querySelector('form').addEventListener('envoyerMessage', postMessage);

const interval = window.setInterval(getMessages, 3000);

getMessages();
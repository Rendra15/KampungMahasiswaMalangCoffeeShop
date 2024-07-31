<body>
    <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
    <!-- <script src="https://mediafiles.botpress.cloud/b7d9a70e-1984-46c9-88e3-4905d3fb00ec/webchat/config.js" defer></script> -->

    <button id="myButton">Click Me!</button>
    <script>
        window.botpressWebChat.init({
            "composerPlaceholder": "Chat with bot",
            "botConversationDescription": "This chatbot was built surprisingly fast with Botpress",
            "botId": "b7d9a70e-1984-46c9-88e3-4905d3fb00ec",
            "hostUrl": "https://cdn.botpress.cloud/webchat/v1",
            "messagingUrl": "https://messaging.botpress.cloud",
            "clientId": "b7d9a70e-1984-46c9-88e3-4905d3fb00ec",
            "webhookId": "820314d3-8dc9-46d6-9782-d4f8bd9577a6",
            "lazySocket": true,
            "themeName": "prism",
            "frontendVersion": "v1",
            "showPoweredBy": true,
            "theme": "prism",
            "themeColor": "#2563eb",
            "allowedOrigins": []
        });

        window.botpressWebChat.onEvent(bpListener[
            'LIFECYCLE.LOADED','LIFECYCLE.READY','LIFECYCLE.RECEIVED'
        ])

        window.addEventListener("load", function(){
            document.getElementById("myButton").addEventListener("Click", handleBtnClick);
        })

        function bpListener(event){
            console.log(event.type, event)
            if(event.type === 'LIFECYCLE.LOADED'){
                window.botpressWebChat.SendEvent({ type:'hide'})
            }

            if(event.type === 'LIFECYCLE.RECEIVED'){
                window.botpressWebChat.SendEvent({ type:'show'})
            }
        }

        function handleBtnClick(event){

        }

    </script>
</body>

{
    'use strict';
    var app=new Vue({
        el:'#app',
        data:()=>({
            chat_input:'',
            //chat_input2:'',
            session_id:'',
            websocket_server:new WebSocket("ws://localhost:8000/"),
        }),
        created:function(){
            this.session_id=document.getElementById('session_id').value;
            this.initWebSocket();
        },
        methods:{
            enter(){
                var chat_msg = this.chat_input;
                this.websocket_server.send(
                    JSON.stringify({
                        'type':'chat',
                        'user_id':this.session_id,
                        'chat_msg':chat_msg
                    })
                );
                this.chat_input='';
            },
            /*enter2(){
                var chat_msg = this.chat_input2;
                this.websocket_server.send(
                    JSON.stringify({
                        'type':'chat2',
                        'user_id':this.session_id,
                        'chat_msg':chat_msg
                    })
                );
                this.chat_input2='';
            },*/
            initWebSocket(){
                var self = this;
                this.websocket_server.onopen = function(e) {
                    self.websocket_server.send(
                        JSON.stringify({
                            'type':'socket',
                            'user_id':this.session_id
                        })
                    );
                };
                this.websocket_server.onerror = function(e) {
                    // Errorhandling
                }
                this.websocket_server.onmessage = function(e)
                {
                    var json = JSON.parse(e.data);
                    switch(json.type) {
                        case 'chat':
                            document.getElementById('chat_output').innerHTML += (json.msg);
                            break;
                        /*case 'chat2':
                            document.getElementById('chat_output2').innerHTML += (json.msg);
                            break;*/
                    }
                }
            }
        }
    })

}
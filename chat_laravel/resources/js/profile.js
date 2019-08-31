/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app2',
    data:{
        Msgtitle:'Click on user from left sidebar',
        content:'',
        privsteMesgs:[],
        newMessage_fr:[],
        singleMsgs:[],
        msgFrom:'',
        converID:'',
        friend_id:'',
        seen:false,
        newMsgFrom: '',
        chatUrl: 'http://localhost/chat_laravel',
    },
    ready:function () { 
      this.created();
    },
    created(){  
      axios.get(this.chatUrl+'/getMessages')
      .then(response=>{
        app.privsteMesgs=response.data;   //we are putting data into our posts array      
        console.log(app.privsteMesgs); // show if success
      })
      .catch(function (error) {
        console.log(error); // run if we have error
      });
      axios.get(this.chatUrl+'/newMessagefriendli')
      .then(response=>{
        app.newMessage_fr=response.data;   //we are putting data into our posts array      
        console.log(app.newMessage_fr); // show if success
      })
      .catch(function (error) {
        console.log(error); // run if we have error
      });
      
    },
    methods:{
      messagescli:function (id){
        axios.get(this.chatUrl+'/getMessages/'+id)
             .then(response=>{
              app.singleMsgs=response.data;   //we are putting data into our posts array   
              app.converID=response.data[0].conversation_id;
              console.log(app.singleMsgs); // show if success 
        })
        .catch(function (error) {
          console.log(error); // run if we have error
        });
      },
      inputMsgpiv(e){
        if(e.keyCode===13 && !e.shiftKey){ //key enter and not newline
          e.preventDefault(); //Prevent  link from opening the URL
          this.sendMsg();
        }
      },
      sendMsg(){
        msgSentT=this;
        if(this.msgFrom){     
            axios.post(this.chatUrl+'/sendMessages',{
              converID:this.converID,
              msg:this.msgFrom
            })         
            .then(function (response) {
              console.log(response.data);
              msgSentT.msgFrom="";
              if(response.status===200){  //http==200 success//　0:Not reading 1:reading 2:is Download 3:Information exchange 4:Processing completed 
                app.singleMsgs=response.data;
              }
            })            
            .catch(function (error) {
              console.log(error); // run if we have error
            }); 
        }  
      },
      friendID: function(id){
        app.friend_id = id;
      },
      sendNewMsg(){
        axios.post(this.chatUrl+'/sendNewMessage', {
               friend_id: this.friend_id,
               msg:this.newMsgFrom,
             })
             .then(function (response) {
               console.log(response.data); // show if success
               if(response.status===200){
                 window.location.replace(this.chatUrl+'/messages');
                 app.Msgtitle = 'message sent has been sent successfully';
               }
             })
             .catch(function (error) {
               console.log(error); // run if we have error
             });
      }
    }   
});

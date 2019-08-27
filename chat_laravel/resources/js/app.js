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
    el: '#app',
    data:{
        msg:'New Post:',
        content:'',
        postsdata:[],
        commentSeen:0,
        countseen:0,
        likes:[],
        chatUrl: 'http://localhost:8888/chat_laravel',
    },
    ready:function () {
      this.created();
    },
    created(){
        axios.get('http://localhost/chat_laravel/posts')
        .then(response=>{
          console.log(response); // show if success
          this.postsdata=response.data;   //we are putting data into our posts array      
          Vue.filter('nowTime', function(value){
            return moment(value).fromNow();
          });
        })
        .catch(function (error) {
          console.log(error); // run if we have error
        });
        //fetching likes
        axios.get('http://localhost/chat_laravel/likes')
        .then(response=>{
          console.log(response); // show if success
          this.likes=response.data;   //we are putting data into our posts array      
        })
        .catch(function (error) {
          console.log(error); // run if we have error
        });
    },
    methods:{
        addPost(){
            axios.post('http://localhost/chat_laravel/addnewPost', {
                 content: this.content
               })
               .then(function (response){
                 console.log('saved successfully'); // show if success
                 if(response.status===200){
                   app.postsdata=response.data;      
                }
               })
               .catch(function (error) {
                 console.log(error); // run if we have error
            });
        },
        deletePost(id){
            axios.get('http://localhost/chat_laravel/deletePost/'+id)
            .then(response=>{
              console.log(response); // show if success
              this.postsdata=response.data;   //we are putting data into our posts array      
            })
            .catch(function (error) {
              console.log(error); // run if we have error
            });
        },
        likePost(id){
            axios.get('http://localhost/chat_laravel/likePost/'+id)
            .then(response=>{
              console.log(response); // show if success
              this.postsdata=response.data;   //we are putting data into our posts array      
            })
            .catch(function (error) {
              console.log(error); // run if we have error
            });
        },
        commentcl(id){
          if(id==app.commentSeen){
            app.countseen+=1;
          }else{
            app.countseen=1;
          }
          app.commentSeen=id;
        }
    }
   
});

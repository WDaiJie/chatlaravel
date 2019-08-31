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
        post:[],
        EditPostData:[],
        commentData:{},
        image:'',
        EditBoo:false,
        updateTextarea:'',
        updatedContent:'',
        chatUrl: 'http://localhost/chat_laravel',
    },
    ready:function () {
      this.created();
    },
    created(){
        axios.get(this.chatUrl+'/posts')
        .then(response=>{
          console.log(response); // show if success
          this.postsdata=response.data;   //we are putting data into our posts array      
          Vue.filter('Newtime', function(value){
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
          addpostvm=this;
            axios.post(this.chatUrl+'/addnewPost', {
                 content: this.content
               })
               .then(function (response){
                addpostvm.content="";
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
            axios.get(this.chatUrl+'/deletePost/'+id)
            .then(response=>{
              console.log(response); // show if success
              this.postsdata=response.data;   //we are putting data into our posts array      
            })
            .catch(function (error) {
              console.log(error); // run if we have error
            });
        },
        likePost(id){
            axios.get(this.chatUrl+'/likePost/'+id)
            .then(response=>{
              console.log(response); // show if success
              this.postsdata=response.data;   //we are putting data into our posts array      
            })
            .catch(function (error) {
              console.log(error); // run if we have error
            });
        },
        commentcl(post,key){
          if(post.id==app.commentSeen){
            app.countseen+=1;
          }else{
            app.countseen=1;
          }    
          app.commentSeen=post.id;
        },
        addComment(post,key){
          axios.post(this.chatUrl+'/addComment', {
            comment: this.commentData[key],
            id:post.id,          
          })
          .then((response)=>{
              console.log('saved successfully'); // show if success
              this.commentData[key]="";
              Vue.filter('Newtime', function(value){
                return moment(value).fromNow();
              });
              if(response.status===200){
                app.postsdata=response.data;       
            }
          })
          .catch(function (error) {
              console.log(error); // run if we have error
          });
        },
        onFileChange(e){ 
          var files=e.target.files || e.dataTransfer.files;  //Judge the event of dragging or uploading
          this.createImg(files[0]);   //file the image/file value to our function
        },
        createImg(file){//we will preview our image before upload
          var image = new Image;
          var reader = new FileReader();  //Create a fileReader to listen for the reader event
          reader.onload = (e) =>{ 
            this.image=e.target.result;// console.log(e.target.result); // The file's text will be printed here
          };
          reader.readAsDataURL(file); //read the contents of the specified Blob or File. 
        },
        removImg(){
          this.image="";
        },
        uploadImg(){
          axios.post(this.chatUrl+'/saveImg', {
                 image: this.image,
                 content:this.content
               })
               .then((response)=>{
                    console.log("save scussesfully"); // show if success
                    this.image="";
                    this.content="";
                    if(response.status===200){
                      this.updateTextarea=response.data;      
                  }
               })
               .catch(function (error) {
                 console.log(error); // run if we have error
            });
        },
        openModel(id){
          axios.get(this.chatUrl+'/Edit_Post/'+id)
            .then(response=>{
              console.log(response); // show if success
              this.EditPostData=response.data;   //we are putting data into our posts array    
              this.updatedContent=response.data[0].content;
            })
            .catch(function (error) {
              console.log(error); // run if we have error
            });
        },
        removEditImg(){
          this.EditPostData[0].image=null;
          app.EditBoo=false;
        },
        onFileChangeEdit(e){
          var files=e.target.files || e.dataTransfer.files;  //Judge the event of dragging or uploading
          this.createEditImg(files[0]);   //file the image/file value to our function
        },
        createEditImg(file){//we will preview our image before upload
          var image = new Image;
          var reader = new FileReader();  //Create a fileReader to listen for the reader event
          reader.onload = (e) =>{ 
            this.EditPostData[0].image=e.target.result;// console.log(e.target.result); // The file's text will be printed here
            app.EditBoo=true;
          };
          reader.readAsDataURL(file); //read the contents of the specified Blob or File. 
        },
        updateEditImg(id){
          axios.post(this.chatUrl+'/updatePostImgTxt/'+id,{
                 Img:this.EditPostData[0].image,
                 updatedContent:this.updatedContent,
                 id:id,
               })
               .then((response)=>{
                    console.log(response); // show if success
                    if(response.status===200){
                      window.location.replace(this.chatUrl);                 
                  }
               })
               .catch(function (error) {
                 console.log(error); // run if we have error
            });
        },
    }
   
});

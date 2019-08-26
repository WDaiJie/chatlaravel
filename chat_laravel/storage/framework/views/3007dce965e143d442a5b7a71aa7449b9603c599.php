<?php $__env->startSection('content'); ?>
<style>
    .msgmain{
        background-color:#c6ccefee;
        border-left:5px solid #c6ccefee;
        border-right:5px solid #c6ccefee;
        position: absolute;
        left:calc(337px);
        height:680px;
    }
    .msgright{
        background-color:#c6ccefee;
        border-left:5px solid #c6ccefee;
        height:680px;
    }
    .msgleft{
        background-color:#c6ccefee;
        border-right:5px solid #c6ccefee;
        height:680px;
    }     
    .m-b-md{
        margin-bottom: 30px0;
    }
    .testMsgArea{
        border:none !important;
    }

</style>
<div class="col-md-12"  id="app2">
<div class="col-md-3 pull-left msgleft hidden-sm hidden-xs"style="heifgt:100%;overflow-x:hidden;background-color:rgb(228, 228, 243);">
        <div class="row" style="padding:10px">
            <div class="col-md-7">Friend List</div>
            <div class="col-md-5 pull-right">
                <a href="<?php echo e(url('/messages')); ?>" class="btn btn-sm btn-info">All messages</a>
            </div>
        </div>
        <div v-for="friendkey in newMessage_fr" >
            <div  class="row" @click="friendID(friendkey.id)" v-on:click="seen = true"  style="padding-right:0px;list-style:none; margin-top:8px; background-color:#ddd;">
                <div class="col-md-3">
                    <img :src="'<?php echo e(Config::get('app.url')); ?>/public/img/'+friendkey.image" style="width:50px;border-radius:100%;">
                </div>
                <div class="col-md-9 " style="margin-top:5px;margin-right:0px;padding-right:0px;">
                    <b> {{friendkey.name}}</b><br>
                    <small>Gender:{{friendkey.gender}}</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7 msgmain hidden-sm hidden-xs" style="background-color:rgb(228, 228, 243);">
        <h3 align="center">Messages</h3>
        <p class="alert alert-success">{{Msgtitle}}</p>
        <div  v-if="seen">
            <input type="hidden" v-model="friend_id">
            <textarea class="col-md-12 form-control" v-model="newMsgFrom"></textarea><br>
            <input type="button" value="send message" @click="sendNewMsg()">
        </div>
    </div>
    <div class="col-md-2 pull-right msgright hidden-sm hidden-xs" style="background-color:rgb(228, 228, 243)">
        <h3 align="center"> User Informatio</h3><hr>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('profile.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\chat_laravel\resources\views/newMessage.blade.php ENDPATH**/ ?>
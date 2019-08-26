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
            <div class="col-md-4"> </div>
            <div class="col-md-6">Messenger</div>
            <div class="col-md-2 pull-right">
                <a href="<?php echo e(url('/newMessage')); ?>">
                <img src="<?php echo e(Config::get('app.url')); ?>/public/img/icon_compose.png" style="width:50px;border-radius:100%;" title="Send New Messages"></a>
            </div>
        </div>    
        <div v-for="privstekey in privsteMesgs" >
            <div  class="row" v-if="privstekey.status==1" @click="messagescli(privstekey.id)" style="padding-right:0px;list-style:none; margin-top:8px; background-color:rgba(213, 216, 255, 0.53);">
                <div class="col-md-3">
                    <img :src="'<?php echo e(Config::get('app.url')); ?>/public/img/' + privstekey.image" style="width:50px;border-radius:100%;">
                </div>
                <div class="col-md-9 " style="margin-top:5px;margin-right:0px;padding-right:0px;">
                    <b> {{privstekey.name}}</b><br>
                    <p style="font-size:15px">here will display message</p>
                </div>
            </div>
            <div  class="row" v-else @click="messagescli(privstekey.id)" style="padding-right:0px;list-style:none; margin-top:8px; background-color:rgb(251, 170, 170);">
                <div class="col-md-3">
                    <img :src="'<?php echo e(Config::get('app.url')); ?>/public/img/' + privstekey.image" style="width:50px;border-radius:100%;">
                </div>
                <div class="col-md-9 " style="margin-top:5px;margin-right:0px;padding-right:0px;">
                    <b> {{privstekey.name}}</b><br>
                    <p style="font-size:15px">here will display message</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-7 msgmain hidden-sm hidden-xs" style="background-color:rgb(228, 228, 243);">
        <h3 align="center">Messages</h3>
        <p class="alert alert-success">{{Msgtitle}}</p>
        <div v-for="singleMsgkey in singleMsgs">
                <div v-if="singleMsgkey.user_from == <?php echo Auth::user()->id; ?>"> 
                    <div class="col-md-12" style="margin-top:10px;padding-right:0px;">
                        <img :src="'<?php echo e(Config::get('app.url')); ?>/public/img/'+singleMsgkey.image" style="width:30px;border-radius:100%; margin-left:5px;"class="pull-right">  
                        <div style="max-width:70%;float:right; background-color:#0084ff;padding:5px 15px 5px 15px; margin-right:10px color:#fff;border-radius:10px;color:#fff;">
                            {{singleMsgkey.msgs}}
                        </div>      
                    </div>                
                </div>
                <div v-else>
                    <div class="col-md-12 pull-right" style="margin-top:10px;padding-left:0px;">
                        <img :src="'<?php echo e(Config::get('app.url')); ?>/public/img/'+singleMsgkey.image" style="width:30px;border-radius:100%; margin-left:5px;"class="pull-left">  
                        <div style="max-width:70%;float:left; background-color:#f0f0f0;padding:5px 15px 5px 15px; margin-left:10px; text-align:right;border-radius:10px;" >
                           {{singleMsgkey.msgs}}
                        </div>    
                    </div>    
                </div>
            </div>
            <hr>
                <input type="hidden" v-model="converID">
                <textarea class="col-md-12 form-control" style="margin-top:15px;" v-model="msgFrom" @keydown="inputMsgpiv"></textarea>  
        </div>

    <div class="col-md-2 pull-right msgright hidden-sm hidden-xs" style="background-color:rgb(228, 228, 243)">
        <h3 align="center"> Left Sidebar</h3><hr>
    </div>
</div>    


<?php $__env->stopSection(); ?>


<?php echo $__env->make('profile.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\chat_laravel\resources\views/messages.blade.php ENDPATH**/ ?>
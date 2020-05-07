<div class="alert alert-success ml-5" role="alert" v-if="status">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <p class="text-center" v-for="msg in msgs" style="margin-bottom: 0px"> @{{ msg }}</p>
</div>
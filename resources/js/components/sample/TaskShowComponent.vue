<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="clo-sm-6">
        <form action="">
          <div class="form-group row border-bottom">
            <label for="id" class="col-sm-3 col-form-label">ID</label>
            <!-- <input type="text" class="col-sm-9 form-comtrol-plaintext readonly" id="id" v-bind:value="taskId"> -->
            <input type="text" class="col-sm-9 form-comtrol-plaintext " readonly id="id" v-model="task.id">
          </div>
          <div class="form-group row border-bottom">
                <label for="title" class="col-sm-3 col-form-label">Title</label>
                <!-- <input type="text" class="col-sm-9 form-control-plaintext" readonly id="title" value="title title"> -->
                <input type="text" class="col-sm-9 form-comtrol-plaintext " readonly id="id" v-model="task.title">
          </div>
          <div class="form-group row border-bottom">
              <label for="content" class="col-sm-3 col-form-label">Content</label>
              <!-- <input type="text" class="col-sm-9 form-control-plaintext" readonly id="content" value="content content"> -->
              <input type="text" class="col-sm-9 form-comtrol-plaintext " readonly id="id" v-model="task.content">
          </div>
          <div class="form-group row border-bottom">
              <label for="person-in-charge" class="col-sm-3 col-form-label">Person In Charge</label>
              <!-- <input type="text" class="col-sm-9 form-control-plaintext" readonly id="person-in-charge" value="Ichiro"> -->
              <input type="text" class="col-sm-9 form-comtrol-plaintext " readonly id="id" v-model="task.person_in_charge">
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        props: {
          taskId:String
        },

        data: function () {
          return {
            task: {}    //初期化
          }
        },
        
        methods:{
          getTask(){
            axios.get('/api/tasks/' + this.taskId)    //API形式でデータ取得
              .then((res) => {
                  this.task = res.data;
              });
          }
        },
        mounted() {
          this.getTask();         //このページが読み込まれる時にgettasksメソッドが呼び出されるように
        }
    }
</script>
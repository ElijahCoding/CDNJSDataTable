<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">

                      <div class="table-responsive">
                        <table class="table table-stripe">
                          
                        </table>
                      </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
          'endpoint'
        ],

        data () {
          return {

          }
        },

        mounted() {
            console.log(this.endpoint)
        }
    }
</script>

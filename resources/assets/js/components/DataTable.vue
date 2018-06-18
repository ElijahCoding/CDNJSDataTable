<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-body">

                      <div class="table-responsive">
                        <table class="table table-stripe">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Link</th>

                              <th>&nbsp;</th>
                              <th>&nbsp;</th>
                            </tr>
                          </thead>

                          <tbody>
                            <tr>

                            </tr>
                          </tbody>
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
            response: {
              name: '',
              link: [],
            },
          }
        },

        mounted() {
            axios.get(this.endpoint).then((response) => {
              this.response = response.data
              console.log(this.response);
            })
        }
    }
</script>

<style lang="scss">
    .sortable {
        cursor: pointer;
    }

    .match {
        color: #4fc08d;
    }

    .well {
        border-radius: 0;
    }

    .arrow {
        display: inline-block;
        vertical-align: middle;
        width: 0;
        height: 0;
        margin-left: 5px;
        opacity: 0.66;

        &--asc {
            border-left: 4px solid transparent;
            border-right: 4px solid transparent;
            border-bottom: 4px solid #222;
        }

        &--desc {
            border-left: 4px solid transparent;
            border-right: 4px solid transparent;
            border-top: 4px solid #222;
        }
    }
</style>

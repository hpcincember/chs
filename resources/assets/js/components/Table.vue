<template>
  
   <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Leaders</div>

                    <div class="panel-body">
                      <vuetable ref="vuetable"
                        api-url="https://vuetable.ratiw.net/api/users"
                        :fields="fields"
                      ></vuetable>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Vuetable from 'vuetable-2/src/components/Vuetable'

export default {
  components: {
    Vuetable
  },
  data () {
    return {
      fields: [
        'name', 'email',
        {
          name: 'birthdate',
          titleClass: 'left aligned',
          dataClass: 'left aligned'
        },
        {
          name: 'nickname',
        },
        {
          name: 'gender',
          titleClass: 'center aligned',
          dataClass: 'center aligned'
        },
        {
          name: 'salary',
          titleClass: 'center aligned',
          dataClass: 'right aligned'
        }
      ]
    }
  }
}
</script>
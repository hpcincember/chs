<template>

   <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                         <vuetable ref="vuetable"
    api-url="http://127.0.0.1:8000/roles-data"
    :fields="['module', 'operation']"
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
  }
}
</script>
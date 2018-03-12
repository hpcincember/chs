<template>
 <div class="container">
        <div class="row">
            <div class="col-lg-12">
            	<div class="panel-group">
				  <div class="panel panel-default">
				    <div class="panel-body table-responsive">
				    	<vuetable ref="vuetable"
						    api-url="http://127.0.0.1:8000/leaders-page-data"
						    :fields="fields"
						    :sort-order="sortOrder"
						    pagination-path=""
						     @vuetable:pagination-data="onPaginationData"
						  >
						  	 <template slot="actions" slot-scope="props">
							  <div class="btn-group" role="group" aria-label="Basic example">
							    <button class="btn btn-primary btn-xs"
							      @click="onAction('view-item', props.rowData, props.rowIndex)">
							      V
							    </button>
							    <button class="btn btn-info btn-xs"
							      @click="onAction('edit-item', props.rowData, props.rowIndex)">
							      E
							    </button>
							    <button class="btn btn-danger btn-xs"
							      @click="onAction('delete-item', props.rowData, props.rowIndex)">
							      D
							    </button>
							  </div>
							  </template>
						  </vuetable>
						   <div class="vuetable-pagination ui basic segment grid">
						    <vuetable-pagination-info ref="paginationInfo"
						       ></vuetable-pagination-info>
						    <vuetable-pagination ref="pagination"  @vuetable-pagination:change-page="onChangePage"></vuetable-pagination>
						</div>
				    </div>
				  </div>
				</div>
                
            </div>
        </div>
			<sweet-modal ref="modal" title="Leader's Information">
				 <table class="table table-bordered table-striped">
				    <tbody>
				      <tr v-for="item,key in items">
				        <td><b>{{ key }}</b></td>
				        <td>{{ item }}</td>
				      </tr>
				   </tbody>
				  </table>
			</sweet-modal>
		
    </div>
 	
</template>

<script src="./leader.js"></script>
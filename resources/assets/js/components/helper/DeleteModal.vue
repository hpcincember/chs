<template>
	<sweet-modal icon="warning" ref="deleteLeader" modal-theme="dark" overlay-theme="dark">
			Are you sure you want to delete this item?
			<br>
			<div class="pull-right">
				<button class="btn btn-primary" @click="deleteLeader">Yes</button>
				<button class="btn btn-default" @click="deleteModalClose">Cancel</button>
			</div>
		</sweet-modal>
</template>
class Service
{
	constructor(action,url,id)
	{
		this.action = action;
		this.url  = url;
		this.data = data;
	}

	post() {

	}

	show() {
		  axios.get('/role/show/'+ data.id)
          .then(function (response) {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
          });
	}
}
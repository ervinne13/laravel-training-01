
let IndexPage = (function () {

    function init(route) {
        IndexPage.route = route;
    }

    function deletePO(transactionCode) {
        axios.delete(`${IndexPage.route}/${transactionCode}`)
                .then(function (response) {                    
                    window.location.reload();
                })
                .catch(function (error) {
                    console.log(error);
                });
    }


    return {init, deletePO};

})();

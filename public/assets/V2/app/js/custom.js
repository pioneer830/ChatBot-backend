const common_helper = {
    globalAjaxRequest: async (params) => {
        const loader = $(`${params.spinner}`)
        loader.show();
        console.log('spinner',loader)
        let response = {}
        try {
            await $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
            response = await $.ajax(params)
            console.log('response',response,params)
            if (response) {
                loader.hide();
            }
        } catch (e) {
            loader.hide();
        }
        return response;
    },

    validationErrorSet: (parent,message) =>{
        $(parent).addClass('is-invalid')
        return $(parent).after(`<div class="invalid-feedback">${message}</div>`);
    },
    removeValidationErrors: () => {
        $('.is-invalid').removeClass('is-invalid')
        $('.invalid-feedback').remove()
    },
    modalOpen:(id)=>{
        $(`${id}`).removeClass('show').addClass('show').show()
        console.log('id',$(`${id}`))
    },
    modalClose:(id)=>{
        let selector = document.querySelector(`${id}`)
        $(`${id}`).removeClass('show');
        selector.style.display='none'
    },
}

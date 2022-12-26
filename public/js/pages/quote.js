$('#table').click(function(e){
    e.preventDefault()
    let btn = e.target
    if(! btn.classList.contains('removeItem')) 
        return undefined

    axios.delete(`${btn.dataset.url}`)
        .then(response => {
            btn.closest('tr').remove()
            $('#mensaje').removeClass('d-none')
            setTimeout(() => {
                $('#mensaje').addClass('d-none')
            }, 4000);
        })
        .catch(error => console.error(error))
})

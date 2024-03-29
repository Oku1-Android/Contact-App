
let filterCompany = document.getElementById("filter_company_id")

    if(filterCompany){
    filterCompany.addEventListener('change',function(){
    // alert(this.value)
    let companyId = this.value || this.options[this.selectedIndex].value
    window.location.href = window.location.href.split('?')[0] + '?company_id=' + companyId
    })

document.querySelectorAll('.btn-delete').forEach((button)=> {
    button.addEventListener('click', function(event){
        event.preventDefault()
        if(confirm("Are you sure?")){
            let action = this.getAttribute('href')
           let form =  document.getElementById('form-delete')
           form.setAttribute('action', action)
           form.submit()
        }
    })
})



//resetting the search or clearing search using the togle button
    document.getElementById('btn-clear').addEventListener('click', ()=>{
    let input = document.getElementById('search'),
    select = document.getElementById('filter_company_id')
    input.value = ""
    select.selectedIndex = 0

    window.location.href = window.location.href.split('?')[0]
    })
}
   // @ts-ignore
//controlling the toggle button physibility
const toggleClearButton = () => {
    let query = location.search,
    pattern = /[?&]search=/,
    button = document.getElementById('btn-clear')

    // if(button == undefined) return;
    if(pattern.test(query)){
        button.style.display = "block"
    }else{
        button.style.display = "none"
    }
}

toggleClearButton()

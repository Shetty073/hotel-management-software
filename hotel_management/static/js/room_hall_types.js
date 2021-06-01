// attach and handle onlclick event on each table row's edit button
document.querySelectorAll('.editDataRowBtn').forEach(item => {
    item.addEventListener('click', function () {
        let createForm = document.querySelector('#createForm');
        let editForm = document.querySelector('#editForm');
        let pk = this.id;
    
        createForm.hidden = true;
        editForm.hidden = false;

        // Fill the input values for editform
        let tr = this.parentNode.parentNode.parentNode;
        let nameTd = tr.firstElementChild;
        let descriptionTd = nameTd.nextElementSibling;

        let name = nameTd.innerText;
        let description = descriptionTd.innerText;
        
        document.querySelector('#newname').value = name;
        document.querySelector('#newdescription').value = description;
        document.querySelector('#pk').value = pk;
    });
});

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
        let roomNumberTd = tr.firstElementChild;
        let nameTd = roomNumberTd.nextElementSibling;
        let roomTypeTd = nameTd.nextElementSibling;
        let pricePerNightTd = roomTypeTd.nextElementSibling;
        roomTypeTd = pricePerNightTd.nextElementSibling;

        let roomNumber = roomNumberTd.innerText;
        let name = nameTd.innerText;
        let roomType = roomTypeTd.innerText;
        let pricePerNight = pricePerNightTd.innerText;
        
        document.querySelector('#new_number').value = roomNumber;
        document.querySelector('#new_room_type').value = roomType;
        document.querySelector('#new_name').value = name;
        document.querySelector('#new_price_per_night').value = pricePerNight;
        
        document.querySelector('#pk').value = pk;
    });
});

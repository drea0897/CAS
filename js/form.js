document.addEventListener('DOMContentLoaded', function() {
    const addGodparentButton = document.getElementById('add_godparent');
    const godparentsList = document.getElementById('godparents-list');
    let godparentIndex = 1;

    addGodparentButton.addEventListener('click', function() {
        const godparentDiv = document.createElement('div');
        godparentDiv.className = 'godparent';

        godparentDiv.innerHTML = `
            <div class="input_field">
                <label for="godparent_name_${godparentIndex}">Name</label>
                <input type="text" id="godparent_name_${godparentIndex}" class="input" name="godparent_name[]">
            </div>
            <div class="input_field">
                <label for="godparent_gender_${godparentIndex}">Gender</label>
                <input type="text" id="godparent_gender_${godparentIndex}" class="input" name="godparent_gender[]">
            </div>
            <div class="input_field">
                <label for="godparent_birthday_${godparentIndex}">Birthday</label>
                <input type="date" id="godparent_birthday_${godparentIndex}" class="input" name="godparent_birthday[]">
            </div>
            <div class="input_field">
                <button type="button" class="remove_godparent btn">Remove</button>
            </div>
        `;

        godparentsList.appendChild(godparentDiv);

        // Add event listener to the new remove button
        godparentDiv.querySelector('.remove_godparent').addEventListener('click', function() {
            godparentDiv.remove();
        });

        godparentIndex++;
    });

    // Add event listener to existing remove button
    document.querySelectorAll('.remove_godparent').forEach(function(button) {
        button.addEventListener('click', function() {
            this.closest('.godparent').remove();
        });
    });
});

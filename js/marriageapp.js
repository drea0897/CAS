
function validateAge() {
    var femaleBirthDate = new Date(document.getElementById('female_birthday').value);
    var maleBirthDate = new Date(document.getElementById('male_birthday').value);
    
    // Calculate age
    var today = new Date();
    var femaleAge = today.getFullYear() - femaleBirthDate.getFullYear();
    var maleAge = today.getFullYear() - maleBirthDate.getFullYear();
    var femaleMonthDiff = today.getMonth() - femaleBirthDate.getMonth();
    var maleMonthDiff = today.getMonth() - maleBirthDate.getMonth();
    if (femaleMonthDiff < 0 || (femaleMonthDiff === 0 && today.getDate() < femaleBirthDate.getDate())) {
        femaleAge--;
    }
    if (maleMonthDiff < 0 || (maleMonthDiff === 0 && today.getDate() < maleBirthDate.getDate())) {
        maleAge--;
    }

    // Check if either person is under 18
    if (femaleAge < 18 || maleAge < 18) {
        alert("Individuals under 18 are not legally allowed to marry.");
        return false; // Prevent form submission
    }
    return true; // Allow form submission
}


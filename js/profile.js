function updateProfileDetails(age, dob, contact) {
    $.ajax({
        type: 'POST',
        url: 'php/profile.php', // Update with your profile update endpoint
        data: { age: age, dob: dob, contact: contact },
        success: function(response) {
            // Handle the profile update success
            console.log('Profile update success:', response);
            // Refresh or update the displayed profile details on the page
            // You may fetch and update the profile details dynamically here
        },
        error: function(error) {
            // Handle profile update error
            console.error('Profile update error:', error);
        }
    });
}

// Event listener for the Save Changes button in the updateProfileModal
$('#saveProfileChanges').on('click', function() {
    // Get values from the input fields
    var updatedAge = $('#updateAge').val();
    var updatedDob = $('#updateDob').val();
    var updatedContact = $('#updateContact').val();

    // Call the updateProfileDetails function
    updateProfileDetails(updatedAge, updatedDob, updatedContact);

    // Close the modal
    $('#updateProfileModal').modal('hide');
});

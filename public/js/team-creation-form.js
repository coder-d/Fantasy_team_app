class TeamCreationForm {
    constructor(formId) {
        this.form = document.getElementById(formId);
        if (this.form) {
            this.form.addEventListener('submit', this.handleSubmit);
        }
    }
    handleSubmit(event) {
        event.preventDefault();
        // Add form validation logic here
        const teamNameInput = this.form.querySelector('#team-name');
        const teamName = teamNameInput.value.trim();
        if (!teamName) {
            alert('Team Name is required.');
        }
        else {
            // Perform team creation logic and API call here
            alert(`Creating team with name: ${teamName}`);
        }
    }
}
// Initialize the form
const teamForm = new TeamCreationForm('team-creation-form');
export default TeamCreationForm;

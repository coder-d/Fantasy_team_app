class TeamCreationForm {
    private form: HTMLFormElement;

    constructor(formId: string) {
        this.form = document.getElementById(formId) as HTMLFormElement;
        if (this.form) {
            this.form.addEventListener('submit', this.handleSubmit);
        }
    }

    private handleSubmit(event: Event) {
        event.preventDefault();
        // Add form validation logic here
        const teamNameInput = this.form.querySelector('#team-name') as HTMLInputElement;
        const teamName = teamNameInput.value.trim();

        if (!teamName) {
            alert('Team Name is required.');
        } else {
            // Perform team creation logic and API call here
            alert(`Creating team with name: ${teamName}`);
        }
    }
}

// Initialize the form
const teamForm = new TeamCreationForm('team-creation-form');

export default TeamCreationForm;

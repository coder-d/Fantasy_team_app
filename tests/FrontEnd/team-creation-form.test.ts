import { JSDOM } from 'jsdom';
import TeamCreationForm from './../../public/js/team-creation-form';

describe('TeamCreationForm', () => {
    let form: HTMLFormElement;
    let dom: JSDOM;

    beforeEach(() => {
        // Set up a new JSDOM instance for each test
        dom = new JSDOM('<!doctype html><html><body></body></html>');

        // Assign window and document to the global object
        (global as any).window = dom.window;
        (global as any).document = dom.window.document;

        // Set up a test DOM with the form
        document.body.innerHTML = `
            <form id="team-creation-form">
                <input type="text" id="team-name" name="team-name" required>
                <button type="submit">Create Team</button>
            </form>
        `;
        form = document.getElementById('team-creation-form') as HTMLFormElement;
    });

    it('should prevent form submission without a team name', () => {
        const teamForm = new TeamCreationForm('team-creation-form');
        const submitEvent = new window.Event('submit', { cancelable: true });
        form.dispatchEvent(submitEvent);

        expect(submitEvent.defaultPrevented).toBeTruthy();
    });

    // Add more test cases as needed
});
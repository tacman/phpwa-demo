import { startStimulusApp } from '@symfony/stimulus-bundle';
import Timeago from 'stimulus-timeago'

const app = startStimulusApp();
// register any custom, 3rd party controllers here
app.register('timeago', Timeago);

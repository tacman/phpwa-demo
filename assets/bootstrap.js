import { startStimulusApp } from '@symfony/stimulus-bundle';
const app = startStimulusApp();
import Timeago from 'stimulus-timeago'

// register any custom, 3rd party controllers here
app.register('timeago', Timeago)

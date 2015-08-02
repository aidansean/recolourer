from project_module import project_object, image_object, link_object, challenge_object

p = project_object('recolourer', 'Recolourer')
p.domain = 'http://www.aidansean.com/'
p.path = 'recolourer'
p.preview_image    = image_object('%s/images/project.jpg'   %p.path, 150, 250)
p.preview_image_bw = image_object('%s/images/project_bw.jpg'%p.path, 150, 250)
p.folder_name = 'aidansean'
p.github_repo_name = 'recolourer'
p.mathjax = True
p.tags = 'Tools'
p.technologies = 'canvas,CSS,HTML,JavaScript'
p.links.append(link_object(p.domain, 'recolourer', 'Live page'))
p.introduction = 'This project has been on my to-do list for a very long time.  The idea is to take an image which is difficult for a colour blind person to view, and then remap the colours to make it easier for them to view.'
p.overview = '''This project has been on the back-burner for many years, and a physicist interested in equal opportunities this issue has been of interest to me since my sabbatical year working as an equal opportunities officer.  Scientists often use colour to make plots clearer, most physicists are male, most colourblind people are male, and most scientist generally do not care about making their plots more accessible.  The situation is getting better, slowly, but I thought it would be useful to have a stop gap tool to help people.  This project was the first step in that direction, but since making the first step there have been many other higher quality tools out there. As a result I stopped working on this project and left it as a legacy tool.

The project takes an image and maps the colours from one part of the rgb space to another, essentially removing the red component.  This should in principle make the images easier to view for someone with red-green colourblindness, although in practice an individual user's colourblindness would have to be mapped out and a custom built algorithm made.  In principle this is not difficult to achieve, I simply didn't dedicate time to this part of the project given the success of other tools.'''

p.challenges.append(challenge_object('The colours had to be matched in a way that retained good discrimination between colours in a smaller colour space.', 'I\'m not actually sure I achieved a good discrimination by removing the red component, but this is as good as I could manage with fairly little time.  The sample image suggests that the boundaries between the various colours looks clear enough.', 'Resolved'))

p.challenges.append(challenge_object('As usual, when using external images it\'s important to check the input.', 'I recycled code from the pixeler project to make sure the images were safe server-side.  Since this tool is used for remapping colours of any image I cannot limit it to the same domain, so PHP must be used.', 'Resolved'))

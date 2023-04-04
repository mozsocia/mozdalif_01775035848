# REPORT 

### Design Implementaion 

Based on  requirements, it was decided to use a JSON file as the database to store the blog posts, as it provides a lightweight and flexible solution for small-scale projects like this. The JSON file contain a key 'blogposts' which is an array of objects, with each object representing a single blog post and containing the post's title, author, date, image, content, and category.

The design of the blog was implemented using HTML, CSS, and PHP. Bootstrap was used as the CSS framework to ensure that the blog is responsive and looks good on all devices. PHP was used to handle the server-side processing of the contact form and to dynamically generate the blog posts' content.

The homepage of the blog consists of a header with a logo, navigation menu, and a featured post section. The navigation menu includes links to other pages on the website, including the blog page and the contact page. The featured post section displays the title, image, and excerpt from the latest blog post, which is retrieved from the JSON file.

The blog page displays a list of blog posts, with the most recent post at the top. Each post displays its title, image, excerpt, and a "Read More" button that links to the full post. The sidebar includes a search bar and a list of categories, which are also retrieved from the JSON file.

The single post page displays the full blog post, including the title, image, content, and author. Social sharing buttons are included to allow readers to share the post on social media. it takes the json array from key 'blogposts' and filter the array using id and display data of that post.

The contact page includes a form that allows users to enter their name, email, subject, and message. 

### C hallenges
1 .One of the main challenges faced during the implementation was parsing the JSON file to retrieve the blog posts' content dynamically. This was overcome by using the built-in PHP functions to parse the JSON file and extract the required information.

2 .Another challenge was Implementing the sidebar for the blog page, which includes a search bar and a list of categories, presented some challenges during the development process. The search bar needed to be functional and able to search through the blog posts based on keywords, while the category list needed to dynamically display all available categories and filter the posts based on the selected category. Implementing these features required proper use of PHP functions to retrieve and display the data from the JSON file. I used javascript and php for Implementing searchbar

3 .Another challenge was ensuring that the website was fully responsive and looked good on all devices. This was overcome by using Bootstrap as the CSS framework and testing the website on various devices and screen sizes to ensure that it was optimized for each one.

Overall, the implementation of the blog using a JSON file as the database was successful, and the final product meets all of the requirements specified in the assignment.
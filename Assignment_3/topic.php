<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name = "description"  content = "Assignment 1 Topic Pages" />
    <meta name = "keywords"     content = "HTML, CSS" />
    <meta name = "author"       content = "Kunjira Pruekthaisong" /> 
    <title>Introductory Home Page</title>

    <link rel="stylesheet" href="style.css">
    
</head>
<body>

<?php 
    include('./includes/header.inc');
    include('./includes/menu.inc');
?>
    


    <article>

    <h1>What is a Wiki?</h1>

        <p>A wiki is a site that is use a collaborative tool where users are allowed to asynchronously make modification and contribution to the content of site. Wikis open-editing system means that users are able to create, organize and share information on websites. This means that the users re fully responsible for the management of the wiki web-page.</p>

        <p>The first wiki was launched in 1995 by an American computer programmer Ward Cunning with the name <strong>WikiWikiWeb</strong> The most famous wiki, <strong>Wikipedia</strong> is an online encyclopedia and may sound familiar to many ears. </p>

   
        <figure id="wiki_image">
            <figcaption><strong>Figure 1: Wikipedia Web-Page</strong> </figcaption>
            <img src="wikipedia.jpeg" alt="wikipedia" style="width:60%" id="img1">
          </figure>

   
    <aside>
        <h2>Definitions</h2>
          <dl>
            <dt>Asynchronous</dt>
                <dd>not happening or done at the same time or speed</dd>
            <dt>Collaborative</dt>
                <dd>produced by or involving two or more parties working together</dd>
            <dt>Encyclopedia</dt>
                 <dd>a book or set of books containing many articles arranged in alphabetical order that deal either with the whole of human knowledge or with a particular part of it, or a similar set of articles on the internet</dd>
          </dl> 
    </aside>

    <section id = "ProsCons">
        <h2>Advantages</h2>
        <ol>
            <li>All users can make modifications</li>
            <li>Accessibility</li>
            <li>Ease of use</li>
            <li>Ease of customisation</li>
            <li>Asynchronous collaborations</li>
            <li>Wiki pages can be link which will allow expansions</li>
        </ol>

        <h2>Disadvantages</h2>
        <ol>
            <li>The availability and ease of access decreases the content's:
            <ul>
                <li>level of confidentiality</li>
                <li>quality</li>
            </ul>
            </li>
            <li>Difficult to track and identify changes made to the wiki</li>
            <li>Difficult to track user contributione</li>
        </ol>
    </section>

    <section id="growth">
        <h2 id = "table_header">Growth of Wikis</h2>
        <table>
            <tr>
                <th>Year</th>
                <th>Events</th>
                <th>Innovations</th>
              </tr>
              <tr>
                <td>1994</td>
                <td>Cunning created the first wiki</td>
                <td></td>
              </tr>
              <tr>
                <td>1995</td>
                <td>The first wiki "WikiWikiWeb" was launched</td>
                <td>RecentVisitors (now disables), People Index</td>
              </tr>
              <tr>
                <td>1996</td>
                <td></td>
                <td>ThreadMode, ThreadModeConsideredHarmful, WikiCategories</td>
              </tr>

              <tr>
                <td>1997</td>
                <td></td>
                <td>RoadMaps</td>
              </tr>
              <tr>
                <td>1998</td>
                <td>Peter Thoeny created TWiki in Perl</td>
                <td></td>
              </tr>
              <tr>
                <td>1999</td>
                <td>- Steve Wainstead created PhpWiki using php <br> - UseModeWiki was developed by Clifford Adams </td>
                <td>ChangeSummary (discontinued), RandomPages, ChangesInMonth</td>
              </tr>

              <tr>
                <td>2000</td>
                <td>The first wiki "WikiWikiWeb" was launched</td>
                <td>SearchHelper</td>
              </tr>

              <tr>
                <td>2004 - 2006</td>
                <td>Huge growth in public interest of wikis</td>
                <td></td>
              </tr>
              
      
        </table>
    </section>

   

</article>

<?php 

    include('./includes/footer.inc') ;
?>
    
</body>
</html>

<!-- 
  CODE THIRD_PARTY ACKNOWLEDGEMENT
  1. https://www.w3schools.com/
  2. https://www.tutorialspoint.com/html/index.htm
  3. https://www.freecodecamp.org

  REFERENCE LIST
  1. https://wikis.fandom.com/wiki/History_of_wikis
  2. http://wiki.c2.com/?PeopleIndex
  3. https://www.mindtools.com/pages/article/how-to-create-a-wiki.htm
  4. https://www.britannica.com/topic/wiki
  5. https://wikieducator.org/Wikieducator_tutorial/What_is_a_wiki/Advantages_and_disadvantages
-->
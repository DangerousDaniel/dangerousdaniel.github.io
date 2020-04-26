$(document).ready(function ()
{
    //tooltip for every item in the table (this was put of jq)
    $( function() {
        $("tr").tooltip();
    });

     //re-order the table for (this was put of jq)
    $( function() {
        $( "#js-table" ).sortable();
        $( "#js-table" ).disableSelection();
    });

    //hide the errors
    $(".errors").hide();

    //read the data from the database
    getAllSpells();
    function getAllSpells()
    {
        //clear the table data
        $("td").remove();
                
        //show the loader
        $(".loader").show();

        //get the data
        $.ajax({
            url: `http://localhost:3000/spells/`,
            type: `GET`,
        }).done(function(responseJSON)
        {
            //hide the loader
            $(".loader").hide();

            //get every item of the data
            responseJSON.forEach(getData);

            function getData(item, index, array)
            {
                //set the data
                let id = array[index].id;
                let name = array[index].name;
                let castingTime = array[index].castingTime;
                let range = array[index].range;
                let components = array[index].components;
                let duration = array[index].duration;
                let description = array[index].description;
                let higherLevel = array[index].higherLevel;
                let material = array[index].material;
                let ritual = array[index].ritual;
           
                //add it to the table
                $("#js-table").append(
                    `<tr title="Description: ${description} \n\n At Higher Levels: ${higherLevel} \n\n Material: ${material} \n\n ${ritual}"> 
                        <td id="${id}"> ${id} </td>  
                        <td> ${name} </td>
                        <td> ${castingTime}</td>
                        <td> ${range} </td>
                        <td> ${components} </td>
                        <td> ${duration} </td>
                        <td> <button class="ui-button ui-widget ui-corner-all" id="btnDelete${id}">Delete</button></td>
                    </tr>`
                );

                  //delete the data by using their id
                  $(`#btnDelete${id}`).click(function(){
                    $.ajax({
                        url: `http://localhost:3000/spells/${id}/`,
                        type: "DELETE",
                        success: function()
                        {
                            //read the data
                            getAllSpells();
                        }
                    });
                  });
            }
           
        });

    }

    //add a spell
    $("#btnSearch").click(function()
    {
        //get the data from the input field
        let searchData = $("#searchInput").val();

        //test date: acid-arrow
        //           mass-cure-wounds

        //reg for input field
        let reg = /[a-z]+/g

        //if the input is valid, do ajax for post
        if (reg.test(searchData))
        {
            //hide the error
            $(".errors").hide();
           
            //get the spell for search for from the dnd json api
            $.ajax({
                url: `https://www.dnd5eapi.co/api/spells/${searchData}/`,
                type: `GET`,
            }).done(function(responseJSON) 
            {
                //get the data form ajax
                let name = responseJSON.name;
                let castingTime = responseJSON.casting_time;
                let range = responseJSON.range;
                let components = getComponents();
                let duration = responseJSON.duration;
                let description = getDesc();
                let higherLevel = getHigherLevel();
                let material = responseJSON.material;
                let ritual = `Ritual: ${responseJSON.ritual}`;

                //set the data to js object
                let data = {
                    "name": name,
                    "castingTime": castingTime,
                    "range": range,
                    "components": components,
                    "duration": duration,
                    "description": description,
                    "higherLevel":  higherLevel,
                    "material": material,
                    "ritual" : ritual,
                }

                //add the data
                $.ajax ({
                    url: "http://localhost:3000/spells/",  
                    type: "POST",
                    data: JSON.stringify(data),
                    contentType: "application/json",
                    dataType: "json",
                    success: function()
                    {
                        //read the data
                        getAllSpells();
                    }
                }); 
                
                 //getters 
                 function getComponents()
                 {
                     let newString = "";
                     for (let i = 0; i < responseJSON.components.length; i++)
                     {
                         newString += responseJSON.components[i];  
                     }
 
                     return newString
                 }
 
                 function getDesc()
                 {
                     let newString = "";
                     for (let i = 0; i < responseJSON.desc.length; i++)
                     {
                         newString += responseJSON.desc[i];  
                     }
 
                     return newString
                 }
 
                 function getHigherLevel()
                 {
                     return `${responseJSON.higher_level}`
                 }
          });
      }

      //else show the error message
      else 
      {
        $(".errors").show(); 
      }
    });
});
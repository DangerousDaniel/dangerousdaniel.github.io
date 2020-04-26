/* Project Name: Sandbox 2020
 * Filename: Dialogue.cs 
 * Last Updated By: Daniel Cox | April 14, 2020
 */

//libraries 
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

[System.Serializable] //Need This line in order edit the text in Unity
public class Dialogue
{
    //Class Variables 
    public string name; //name of the NPC or object

    [TextArea(3,10)]
    public string[] sentences;  //the sentences of the dialogue
}

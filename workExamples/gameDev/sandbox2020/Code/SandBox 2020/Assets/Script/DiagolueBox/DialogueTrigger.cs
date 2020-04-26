/* Project Name: Sandbox 2020
 * Filename: DialogueTrigger.cs 
 * Last Updated By: Daniel Cox | April 14, 2020
 */

//libraries 
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class DialogueTrigger : MonoBehaviour
{
    //Class Variables 
    public Dialogue dialogue; //get the object of the dialogue
    public GameObject DialogueBox; //the game objects of the Dialogue Box

    //use for collision detection on a object
    void OnCollisionEnter(Collision collision)
    {
        //if the player hit the object
        if (collision.collider.tag == "Player")
        {
            //start the dialogue
            FindObjectOfType<DialogueManager>().StartDialogue(dialogue);
        }
    }

    //a object is no longer touching with another object
    void OnCollisionExit(Collision collisionInfo)
    {
        //if the object no longer see the player
        if (collisionInfo.transform.tag == "Player")
        {
            //disable the DialogueBox
            DialogueBox.SetActive(false);
        }
    }
    
}

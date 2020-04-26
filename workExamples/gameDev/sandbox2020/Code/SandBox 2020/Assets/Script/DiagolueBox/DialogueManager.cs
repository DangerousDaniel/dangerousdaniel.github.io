/* Project Name: Sandbox 2020
 * Filename: DialogueManager.cs 
 * Last Updated By: Daniel Cox | April 14, 2020
 */

//libraries 
using System;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;


public class DialogueManager : MonoBehaviour
{
    //Class Variables 
    public Text nameText; //UI Text for the name of the NPC or object
    public Text dialogueText; // UI Text for the dialogue of the NPC or object
    public GameObject DialogueBox; //The game object of the DialogueBox

    private Queue<string> sentences; //A queue of sentence for the dialogue

    // Start is called before the first frame update
    void Start()
    {
        //initialize a queue of sentences
        sentences = new Queue<string>();

        //disable the DialogueBox
        DialogueBox.SetActive(false);
    }

    //Start the dialogue of the NPC or object
    public void StartDialogue(Dialogue dialogue)
    {
        //enable the Dialogue
        DialogueBox.SetActive(true);

        //set the UI Text to the name of NPC or Object
        nameText.text = dialogue.name;

        //clear the queue
        sentences.Clear();

        //get all the sentiences for the NPC or object
        foreach (string sentence in dialogue.sentences)
        {
            sentences.Enqueue(sentence);
        }

        //go to the next sentence
        DisplayNextSentence();
    }

    //get the next sentence
    public void DisplayNextSentence()
    {
        //if there no sentences left
        if (sentences.Count == 0)
        {
            //end the dialogue and exit out the method
            EndDialgue();
            return;
        }

        //get the next one in the queue
        string sentence = sentences.Dequeue();

        //animate the UI dialogue text
        StopAllCoroutines();
        StartCoroutine(TypeSentence(sentence));
    }

    // Update is called once per frame
    private void Update()
    {
        //if the user press enter or A on Xbox
        if (Input.GetKeyDown(KeyCode.Return) || Input.GetKeyDown(KeyCode.Joystick1Button0))
        {
            //go to the next sentence
            DisplayNextSentence();
        }
    }

    //animate the UI Text for the dialogue
    IEnumerator TypeSentence (string sentence)
    {
        //set the dialogue text to a empty string
        dialogueText.text = "";

        //add each char to the dialogue
        foreach (char letter in sentence.ToCharArray())
        {
            dialogueText.text += letter;
            yield return null;
        }
    }

    //end the dialogue of the NPC or object
    void EndDialgue()
    {
        //disable the DialogueBox
        DialogueBox.SetActive(false);
    }
}

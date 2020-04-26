/* Project Name: Sandbox 2020
 * Filename: PlayerMovement.cs 
 * Last Updated By: Daniel Cox | April 14, 2020
 */

//libraries 
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PlayerMovement : MonoBehaviour
{
    //Class Variables
    public Rigidbody rb; //rigidbody of the player
    public int speed = 10; //speed of the player

    public int crouchSpeed = 3; //how fast the player is moving when crouching 
    public SphereCollider PlayerBoxCollider;  //the box collider of the player
    public SphereCollider BoxColliderCH; //the box collider for crouching (half of the play box collier)

    // Start is called before the first frame update
    void Start()
    {
        //enable the player boxes collider 2D
        PlayerBoxCollider.enabled = true;

        //disable the crouching box collider 2D 
        BoxColliderCH.enabled = false;
    }

    // Update is called once per frame
    void FixedUpdate()
    {
        //move the player left,right, up and down
        float moveHorizontal = Input.GetAxis("Horizontal");
        float moveVertical = Input.GetAxis("Vertical");
        Vector3 movemnet = new Vector3(moveHorizontal, 0.0f, moveVertical);

        //move without crouching
        if (PlayerBoxCollider.enabled == true)
        {
              rb.AddForce(movemnet * speed);
        }

        //move with crouching
        else if (BoxColliderCH.enabled == true)
        {
              rb.AddForce(movemnet * crouchSpeed);
        }

        //couching 
        //enable the crouching when the user press C
        if (Input.GetKey(KeyCode.C))
        {
            //disable it
            if (BoxColliderCH.enabled == true)
            {
                BoxColliderCH.enabled = false;
                PlayerBoxCollider.enabled = true;
  
            }

            //enable it
            else if (BoxColliderCH.enabled == false)
            {
                BoxColliderCH.enabled = true;
                PlayerBoxCollider.enabled = false;
                
            }   
        }
    }
}

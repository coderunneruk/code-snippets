//
//  numberExtensions.swift
//  
//  Created by Jonathan Rudderham on 14/08/2022.
//

import Foundation

extension Double {

  // Usage: number.removeZero
  // A Double such as 23.5000 will return a String of 23.5

    var removeZero:String {
        let nf = NumberFormatter()
        nf.minimumFractionDigits = 0
        nf.maximumFractionDigits = 1
        return nf.string(from: self as NSNumber)!
    }
}

extension Int {
  
  // Usage: number.number2word
  // An Int such as 23 will return a String of "twenty-three"
  
    var number2word: String {
        var word: String = String(self)
        let numArray: [String] = ["zero", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten", "eleven", "twelve", "thir", "for", "fif", "six", "seven", "eight", "nine"]
        let tenArray: [String] = ["", "", "twenty", "thirty", "forty", "fifty", "sixty", "seventy", "eighty", "ninety"]        
        if self <= 12 {
            word = numArray[self]
        }
        if self > 12 && self < 20 {
            word = numArray[self] + "teen"
        }
        if self >= 20 && self < 100 {
            let tenWord = String(String(self).first!)
            let firstWord = tenArray[Int(tenWord) ?? 0]
            var secondWord = ""
            let secondNum = String(String(self).last!)
            if secondNum != "0" && secondNum != "" {
                secondWord = "-" + numArray[Int(secondNum) ?? 0]
            }
            word = firstWord + secondWord
        }
        return word
    }
}
